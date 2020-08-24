<?php

namespace Tanthammar\TallForms;

use Illuminate\Support\Arr;

class BaseField
{
    protected $name;
    protected $type;
    protected $input_type;
    protected $textarea_rows;
    protected $options;
    protected $default;
    protected $autocomplete;
    protected $placeholder;
    protected $help;
    protected $rules;
    protected $prefix;
    protected $icon;
    protected $colspan;
    protected $fieldW;
    protected $labelW;
    protected $class;
    protected $group_class = 'rounded border bg-gray-50';
    protected $errorMsg;
    protected $is_relation = false;
    protected $is_custom = false;
    protected $step = 1;
    protected $min = 0;
    protected $max;
    protected $labelSuffix;

    public function __get($property)
    {
        return $this->$property;
    }

    public function input(string $type = 'text'): BaseField
    {
        $this->type = 'input';
        $this->input_type = $type;
        return $this;
    }

    public function textarea(int $rows = 2): BaseField
    {
        $this->type = 'textarea';
        $this->textarea_rows = $rows;
        return $this;
    }

    public function select(array $options = [])
    {
        $this->type = 'select';
        $this->options($options);
        return $this;
    }

    public function checkbox(): BaseField
    {
        $this->type = 'checkbox';
        return $this;
    }


    public function range(): BaseField
    {
        $this->type = 'range';
        return $this;
    }

    public function checkboxes(array $options = []): BaseField
    {
        $this->type = 'checkboxes';
        $this->options($options);
        return $this;
    }

    public function radio(array $options = []): BaseField
    {
        $this->type = 'radio';
        $this->options($options);
        return $this;
    }


    protected function options(array $options): void
    {
        $this->options = Arr::isAssoc($options) ? array_flip($options) : array_combine($options, $options);
    }


    public function relation(): BaseField
    {
        $this->is_relation = true;
        return $this;
    }

    public function custom(): BaseField
    {
        $this->is_custom = true;
        return $this;
    }

    public function default($default): BaseField
    {
        $this->default = $default;
        return $this;
    }

    /**
     * Only applied to fields of type input
     * @param string $autocomplete
     * @return $this
     */
    public function autocomplete(string $autocomplete): BaseField
    {
        $this->autocomplete = $autocomplete;
        return $this;
    }

    /**
     * Only applied to fields on type input, textarea, select
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder): BaseField
    {
        $this->placeholder = $placeholder;
        return $this;
    }


    public function help(string $help): BaseField
    {
        $this->help = $help;
        return $this;
    }

    /**
     * Only applied to fields of type input
     * @param string $prefix
     * @return $this
     */
    public function prefix(string $prefix): BaseField
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * Only applied to fields of type input
     * @param $icon
     * @return $this
     */
    public function icon(string $icon): BaseField
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Standard Laravel validation syntax
     * @param array|string $rules
     * @return $this
     */
    public function rules($rules): BaseField
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Default 6 of 6 columns
     * @param int $cols
     * @return BaseField
     */
    public function colspan(int $cols): BaseField
    {
        $this->colspan = $cols;
        return $this;
    }

    /**
     * Default sm:w-2/3
     * @param $class
     * @return BaseField
     */
    public function fieldWidth(string $class): BaseField
    {
        $this->fieldW = $class;
        return $this;
    }

    /**
     * Used only in inline form
     * Default sm:w-1/3
     * @param string $class
     * @return BaseField
     */
    public function labelWidth(string $class): BaseField
    {
        $this->labelW = $class;
        return $this;
    }

    /**
     * Applied to the field wrapper
     * @param string $classes
     * @return BaseField
     */
    public function class(string $classes): BaseField
    {
        $this->class = $classes;
        return $this;
    }

    /**
     * Applied to the outer wrapper surrounding Array and KeyVal field groups
     * Default 'rounded border bg-gray-50';
     *
     * @param $classes
     * @return $this
     */
    public function groupClass(string $classes): BaseField
    {
        $this->group_class = $classes;
        return $this;
    }

    /**
     * Add a custom error message displayed on field validation error
     * @param $string
     * @return $this
     */
    public function errorMsg(string $string): BaseField
    {
        $this->errorMsg = $string;
        return $this;
    }

    public function step(float $step): BaseField
    {
        $this->step = $step;
        return $this;
    }


    public function min(float $min): BaseField
    {
        $this->min = $min;
        return $this;
    }

    public function max(float $max): BaseField
    {
        $this->max = $max;
        return $this;
    }

    public function labelSuffix(string $string): BaseField
    {
        $this->labelSuffix = $string;
        return $this;
    }
}
