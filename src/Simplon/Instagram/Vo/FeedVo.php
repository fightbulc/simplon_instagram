<?php

    namespace Simplon\Instagram\Vo;

    class FeedVo
    {
        protected $_count;
        protected $_feedData;
        protected $_mediaVoMany;

        // ######################################

        /**
         * @param array $data
         *
         * @return FeedVo
         */
        public function setData(array $data)
        {
            $this->setFeedData($data);

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getCount()
        {
            return count($this->_feedData);
        }

        // ######################################

        /**
         * @return array
         */
        public function getFeedData()
        {
            return (array)$this->_feedData;
        }

        // ######################################

        /**
         * @param array $data
         *
         * @return FeedVo
         */
        public function setFeedData(array $data)
        {
            $this->_feedData = $data;

            return $this;
        }

        // ######################################

        /**
         * @return MediaVo[]
         */
        public function getItems()
        {
            if (!$this->_mediaVoMany)
            {
                $this->_mediaVoMany = [];

                foreach ($this->getFeedData() as $media)
                {
                    $this->_mediaVoMany[] = (new MediaVo())->setData($media);
                }
            }

            return $this->_mediaVoMany;
        }
    } 