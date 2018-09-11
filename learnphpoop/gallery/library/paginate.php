<?php 
	class Paginate{
		public $current_page;
		public $items_per_page;
		public $items_total_count;
		public $class = "pagination";

		public function __construct($current_page=1, $items_per_page=3, $items_total_count=0){
			$this->current_page = (int)$current_page;
			$this->items_per_page = (int)$items_per_page;
			$this->items_total_count = (int)$items_total_count;
		}

		public function next(){
			return $this->current_page + 1;
		}

		public function previous(){
			return $this->current_page - 1;
		}

		public function page_total(){
			return ceil($this->items_total_count / $this->items_per_page);
		}

		public function has_previous(){
			return $this->previous() >= 1 ? true : false;
		}

		public function has_next(){
			return $this->next() <= $this->page_total() ? true : false;
		}

		public function offset(){
			return ($this->current_page - 1) * $this->items_per_page;
		}

		public function render(){
			if($this->page_total() > 1){

                $pagination = '<ul class="' . $this->class . '">';

                //prev
                if($this->has_previous()){
                    $pagination .= '<li class="prev">';
                    $pagination .= '<a href="index.php?page=' . $this->previous() . '">Prev</a>';
                    $pagination .= '</li>';
                }

                //numbers
                for($i=1; $i <= $this->page_total(); $i++){
                    $pagination .= '<li class="page-item';

                    //active link
                    if($this->current_page == $i) $pagination .= ' active';

                    $pagination .= '">';

                    if($this->current_page == $i) $pagination .= '<span class="page-link">' . $i . '</span>';
                    else $pagination .= '<a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a>';
                    $pagination .= '</li>';
                }

                //next
                if($this->has_next()){
                    $pagination .= '<li class="next">';
                    $pagination .= '<a href="index.php?page=' . $this->next() . '">Next</a>';
                    $pagination .= '</li>';
                }

                $pagination .'</ul>';

                return $pagination;

            }
		}
	}
 ?>