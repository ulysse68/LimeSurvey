<?php
    /**
     * Example plugin that can not be activated.
     */
    class UnActivatable extends PluginBase
    {
        static protected $description = 'Demo: This plugin can not be deactivated';
        static protected $name = 'Unactivatable';

        public function __construct(PluginManager $manager, $id) {
            parent::__construct($manager, $id);
            $this->subscribe('beforeActivate');
        }

        public function beforeActivate()
        {
            $event = $this->getEvent();
            $event->set('success', false);

            // Optionally set a custom error message.
            $event->set('message', 'Custom error message from plugin.');
        }
    }
?>