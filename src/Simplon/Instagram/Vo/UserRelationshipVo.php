<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Helper\VoDataHelper;

    class UserRelationshipVo
    {
        protected $_outgoingStatus;
        protected $_incomingStatus;

        // ######################################

        /**
         * @param array $data
         *
         * @return UserRelationshipVo
         */
        public function setData(array $data)
        {
            (new VoDataHelper())
                ->setField('outgoing_status', function ($val) { $this->setOutgoingStatus($val); })
                ->setField('incoming_status', function ($val) { $this->setIncomingStatus($val); })
                ->applyOn($data);

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getOutgoingStatus()
        {
            return (string)$this->_outgoingStatus;
        }

        // ######################################

        /**
         * @param string $status
         *
         * @return UserRelationshipVo
         */
        public function setOutgoingStatus($status)
        {
            $this->_outgoingStatus = $status;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getIncomingStatus()
        {
            return (string)$this->_incomingStatus;
        }

        // ######################################

        /**
         * @param string $status
         *
         * @return UserRelationshipVo
         */
        public function setIncomingStatus($status)
        {
            $this->_incomingStatus = $status;

            return $this;
        }
    } 