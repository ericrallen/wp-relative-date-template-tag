<?php

		//class for computing relative date
		class ia_Relative_Date {

			//the logic contained in this class was modified from StackOverFlow
			//reference: http:stackoverflow.com/questions/11/calculating-relative-time/12#answer-18393

			//private vars for storage
			private $post, $date, $time_period, $time_total, $today, $periods;

			//public vars
			var $output, $options;

			var $defaults = array(
				'period' => '',
				'suffix' => 'ago',
				'id' => ''
			);

			//constructor function
			public function __construct(array $params = null) {
				//if there is already an instance
				if(isset($this->_instance)) {
					//return it
					return $this->_instance;
				//if there isn't
				} else {
					//check for passed parameters
					if(!empty($params) && is_array($params)) {
						$this->options = array_merge($this->defaults, $params);
					} else {
						$this->options = $this->defaults;
					}

					//initialize relative date
					if($this->initialize()) {
						$this->_instance = $this;
					} else {
						return false;
					}
				}
			}

			//get relative date
			private function initialize() {
				$this->set_times();
				$this->get_post();
				$this->get_date();
				$this->output = $this->find_relative();
			}

			//set time vars
			private function set_times() {
				//$this->today = time();
				$date = new DateTime(null, new DateTimeZone(get_option('timezone_string')));
				$this->today = $date->getTimestamp() + $date->getOffset();

				$this->periods = array();

				$this->periods['seconds'] = 1;										//1 second in Unix Time
				$this->periods['minutes'] = $this->periods['seconds'] * 60;			//1 minut in Unix Time
				$this->periods['hours'] = $this->periods['minutes'] * 60;			//1 hour in Unix Time
				$this->periods['days'] = $this->periods['hours'] * 24;				//1 day in Unix Time
				$this->periods['weeks'] = $this->periods['days'] * 7;				//1 week in Unix Time
				$this->periods['months'] = $this->periods['days'] * 30;				//~1 month in Unix Time
				$this->periods['years'] = $this->periods['days'] * 365;				//~1 year in Unix Time
				$this->periods['decades'] = $this->periods['years'] * 10;			//~10 years in Unix Time
				$this->periods['centuries'] = $this->periods['decades'] * 10;		//~100 years in Unix Time
				$this->periods['millenia'] = $this->periods['centuries'] * 10;		//~1,000 years in Unix Time
			}

			//retrieve post
			private function get_post() {
				$this->post = get_post($this->options['id']);
			}

			//retrieve date
			private function get_date() {
				$this->date = $this->check_unix($this->post->post_date);
			}

			//retrieve relative date
			private function find_relative() {
				$since = $this->today - $this->date;
				$this->check_periods($since, $this->options['period']);
				$this->check_name();
				return $this->build_rel_date();
			}

			//make sure date is a valid unix timestamp
			private function check_unix($d) {
				//BEGIN modified from: http:stackoverflow.com/questions/2524680/check-whether-the-string-is-a-unix-timestamp#answer-2524761
				if((string) (int) $d !== $d) {
					//go ahead and convert it, just to be sure
					$d = date('U', strtotime($d));
				}
				return $d;
				//END modified
			}

			//get values for relative time diplay
			private function check_periods($s, $p) {
				//start with empty values
				$time_period = '';
				$time_total = 0;

				//iterate through periods and separate name and # of seconds
				foreach($this->periods as $key => $check) {
					//find how many n periods we can make with that many seconds
					$n = floor($s / $check);

					//if periods were found
					if($n > 0) {
						//set temporary variables
						$time_period = $key;
						$time_total = $n;
						
						//if this is the desired period, exit loop
						if($p == $key) {
							break;
						}
					//if none were found, exit loop
					} else {
						break;
					}
				}

				//double check for time vlaues
				if($time_period === '' || $time_total === 0) {
					$time_period = 'moments';
					$time_total = 'just';
				}

				$this->time_period = $time_period;
				$this->time_total = $time_total;
			}

			//check for correct pluralization
			private function check_name() {
				//if it's singular
				if($this->time_total < 2 && is_numeric($this->time_total)) {
					//if this is millenia, change the pluralization accordingly
					if($this->time_period == 'millenia') {
						$this->time_period = ' ' . 'millenium';
					//if this is centuries, change the pluralization accordingly
					} elseif($this->time_period == 'centuries') {
						$this->time_period = ' ' . 'century';
					//otherwise just add an s
					} else {
						$this->time_period = ' ' . substr($this->time_period, 0, -1);
					}
				}
			}

			//assemble date
			private function build_rel_date() {
				return $this->time_total . ' ' . $this->time_period . ' ' . $this->options['suffix'];
			}

		}

	?>