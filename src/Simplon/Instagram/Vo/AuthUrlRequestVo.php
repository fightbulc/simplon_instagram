<?php

    namespace Simplon\Instagram\Vo;

    use Simplon\Instagram\Core\InstagramConstants;

    class AuthUrlRequestVo
    {
        protected $_scopes = [];
        protected $_state;

        // ######################################

        /**
         * @return array|null
         */
        public function getScopes()
        {
            return !empty($this->_scopes) ? (array)$this->_scopes : NULL;
        }

        // ######################################

        /**
         * @return bool
         */
        public function hasScopes()
        {
            return $this->getScopes() !== NULL;
        }

        // ######################################

        /**
         * @return null|string
         */
        public function getScopesString()
        {
            return $this->hasScopes() === TRUE ? join('+', $this->getScopes()) : NULL;
        }

        // ######################################

        /**
         * @return AuthUrlRequestVo
         */
        public function allowComments()
        {
            $this->_scopes[] = InstagramConstants::SCOPE_COMMENTS;

            return $this;
        }

        // ######################################

        /**
         * @return AuthUrlRequestVo
         */
        public function allowFollow()
        {
            $this->_scopes[] = InstagramConstants::SCOPE_RELATIONSHIPS;

            return $this;
        }

        // ######################################

        /**
         * @return AuthUrlRequestVo
         */
        public function allowLikes()
        {
            $this->_scopes[] = InstagramConstants::SCOPE_LIKES;

            return $this;
        }

        // ######################################

        /**
         * @return null|string
         */
        public function getState()
        {
            return $this->_state !== NULL ? (string)$this->_state : NULL;
        }

        // ######################################

        /**
         * @return bool
         */
        public function hasState()
        {
            return $this->getState() !== NULL;
        }

        // ######################################

        /**
         * @param string $state
         *
         * @return AuthUrlRequestVo
         */
        public function setState($state)
        {
            $this->_state = $state;

            return $this;
        }
    } 