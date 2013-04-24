<?php 
    class YesNoQuestionObject extends QuestionBase implements iQuestion 
    {
        protected $attributes = array(
            'question' => array(
                'type' => 'html',
                'localized' => true,
                'label' => 'Question text:'
            ),
            'help' => array(
                'type' => 'html',
                'localized' => true,
                'label' => 'Help text:'
            ),
            'mandatory' => array(
                'type' => 'boolean',
                'label' => 'Mandatory:'
            ),
            'display' => array(
                'label' => 'Display using:',
                'type' =>  'select',
                'options' => array(
                    'radio' => 'Radio buttons',
                    'dropdown' => 'Dropdown list',
                    'checkbox' => 'Checkbox'
                    
                ),
                'localized' => false,
                'advanced' => false,
                'default' => 'dropdown'
            )
        );
        
        public static $info = array(
            'name' => 'Yes/No question'
        );
        /**
         * The signature array is used for deriving a unique identifier for
         * a question type.
         * After initial release the contents of this array may NEVER be changed.
         * Changing the contents of the array will identify the question object
         * as a new question type and will break many if not all existing surves.
         * 
         * 
         * - Add more keys to make it more unique.
         * @var array
         */
        protected static $signature = array(
            'orignalAuthor' => 'Sam Mousa',
            'originalName' => 'Yes / No',
            'startDev' => '2013-30-1'
        );


        public static function getJavascript()
        {
            $functions = parent::getJavascript();
            // Override get and set if using checkbox layout.
            $functions['get'] =
            'js:function(variable) {
                if (!($(this).prop("type") == "checkbox")) {
                return $(this).val();
                } else {
                var a = $("input[name=" + $(this).prop("name") + "]").serializeArray(); return a[a.length-1].value;}
            }';
            $functions['set'] = 'js:function(variable, value) { 
                if (!($(this).prop("type") == "checkbox")) {$(this).val(value);
                } else {
                $(this).prop("checked", $(this).prop("value") == value)}
                }';
            return $functions;
        }
        /**
         * Renders the question object. The question object MUST create an element
         * with an id equal to $name.
         * @param boolean $return
         * @param string $name Unique string prefix to be used for all elements with a name and or id attribute.
         * @return null|html
         */
        
        public function render($name, $language, $return = false) 
        {
            $questionText = $this->get('question', '', $language);
            
            $value = $this->getResponse();
            
            
            $out = CHtml::label($this->api->EMevaluateExpression($questionText), $name);
            
            $data = array(
                1 => 'Yes',
                0 => 'No'
            );
            switch ($this->get('display')) {
                case 'dropdown':
                    $out .= CHtml::dropDownList($name, $value, $data);
                    break;
                case 'checkbox':
                    $out .= CHtml::checkBox($name, $value, array('uncheckValue' => 0, 'value' => 1));
                    break;
                case 'radio' :
                default:
                    $out .= CHtml::radioButtonList($name, $value, $data);

            }
            if ($return)
            {
                return $out;
            }
            else
            {
                echo $out;
            }
        }
    }
?>