<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class ImageVo
    {
        protected $_url;
        protected $_width;
        protected $_height;

        // ######################################

        /**
         * @param array $data
         *
         * @return ImageVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('url', function ($val) { $this->setUrl($val); })
                ->setField('width', function ($val) { $this->setWidth($val); })
                ->setField('height', function ($val) { $this->setHeight($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getHeight()
        {
            return (int)$this->_height;
        }

        // ######################################

        /**
         * @param int $height
         *
         * @return ImageVo
         */
        public function setHeight($height)
        {
            $this->_height = $height;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUrl()
        {
            return (string)$this->_url;
        }

        // ######################################

        /**
         * @param string $url
         *
         * @return ImageVo
         */
        public function setUrl($url)
        {
            $this->_url = $url;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getWidth()
        {
            return (int)$this->_width;
        }

        // ######################################

        /**
         * @param int $width
         *
         * @return ImageVo
         */
        public function setWidth($width)
        {
            $this->_width = $width;

            return $this;
        }
    } 