<?php declare(strict_types=1);
    
    class TagBuilder {
        private $data;
        private $tag;


        public function setData(string $newData) {
            $this->data = $newData;
        } 

        public function setTag(string $newTag) {
            $this->tag = $newTag;
        }

        public function getData(){
            return $this->data;
        }

        public function getTag(){
            return $this->tag;
        }

        public function surround(string $tag, mixed $data) : TagBuilder {
            $this->setData("<$tag>" . $data . "</$tag>");
            return $this;
        }

        public function append(string $tag, mixed $data) : TagBuilder {
            $this->setData($this->data . "<$tag>" . $data . "</$tag>");
            return $this;
        }

        public function preppend(string $tag, mixed $data) : TagBuilder {
            $this->setData("<$tag>" . $data . "</$data>" . $this->data);
            return $this;
        }

        public function build() : string {
            return $this->data;
        }
    }
?>