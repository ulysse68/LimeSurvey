<?php 
    Yii::import('application.helpers.Hash', true);
    /**
     * 
     */
    class LimeScript extends CApplicationComponent
    {
        protected $data = array();

        public function init()
        {
            /* @var CClientScript $cs */
            $cs = Yii::app()->getClientScript();

            $cs->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.LimeScript.assets'). '/script.js'));
            
            $this->data['data']['baseUrl']                    = Yii::app()->getBaseUrl(true);
            $this->data['data']['showScriptName']             = Yii::app()->urlManager->showScriptName;
            $this->data['data']['urlFormat']                  = Yii::app()->urlManager->urlFormat;
            $this->data['data']['adminImageUrl']              = Yii::app()->getConfig('adminimageurl');
            $this->data['data']['replacementFields']['path']  = Yii::app()->createUrl("admin/limereplacementfields/sa/index/");
            $cs->registerScript('LimeScript', $this, CClientScript::POS_HEAD);
        }


        public function add($key, $value)
        {
            $this->data = Hash::insert($this->data, $key, $value);
        }

        /**
         * We pass a reference to this object to CClientScript.
         * CClientScript will call __toString when it's rendering the script.
         * @return string
         */
        public function __toString()
        {
            $data = CJavaScript::encode($this->data);
            // If debugging then add some very basic pretty printing for easier reading.
            if (defined('YII_DEBUG'))
            {
                $data = str_replace('{', "{\n", $data);
            }
            $script = "$.extend(LS, " . $data . ");\n";
            return $script;
        }
    }

?>