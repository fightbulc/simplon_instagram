<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class TagVo
    {
        protected $_mediaCount;
        protected $_name;

        // ######################################

        /**
         * @param array $data
         *
         * @return TagVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('media_count', function ($val) { $this->setMediaCount($val); })
                ->setField('name', function ($val) { $this->setName($val); })
                ->applyOn($data);
            
            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getMediaCount()
        {
            return (int)$this->_mediaCount;
        }

        // ######################################

        /**
         * @param int $mediaCount
         *
         * @return TagVo
         */
        public function setMediaCount($mediaCount)
        {
            $this->_mediaCount = $mediaCount;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getName()
        {
            return (string)$this->_name;
        }

        // ######################################

        /**
         * @param string $name
         *
         * @return TagVo
         */
        public function setName($name)
        {
            $this->_name = $name;

            return $this;
        }
    } 