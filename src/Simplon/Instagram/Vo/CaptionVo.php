<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class CaptionVo
    {
        protected $_id;
        protected $_text;
        protected $_from;
        protected $_createdTime;
        protected $_userShortVo;

        // ######################################

        /**
         * @param array $data
         *
         * @return CaptionVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('id', function ($val) { $this->setId($val); })
                ->setField('text', function ($val) { $this->setText($val); })
                ->setField('from', function ($val) { $this->setFrom($val); })
                ->setField('created_time', function ($val) { $this->setCreatedTime($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getCreatedTime()
        {
            return (int)$this->_createdTime;
        }

        // ######################################

        /**
         * @param int $createdTime
         *
         * @return CaptionVo
         */
        public function setCreatedTime($createdTime)
        {
            $this->_createdTime = $createdTime;

            return $this;
        }

        // ######################################

        /**
         * @return UserShortVo
         */
        public function getFrom()
        {
            if (!$this->_userShortVo)
            {
                $this->_userShortVo = (new UserShortVo())->setData($this->_from);
            }

            return $this->_userShortVo;
        }

        // ######################################

        /**
         * @param array $from
         *
         * @return CaptionVo
         */
        public function setFrom(array $from)
        {
            $this->_from = $from;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param string $id
         *
         * @return CaptionVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getText()
        {
            return (string)$this->_text;
        }

        // ######################################

        /**
         * @param string $text
         *
         * @return CaptionVo
         */
        public function setText($text)
        {
            $this->_text = $text;

            return $this;
        }
    } 