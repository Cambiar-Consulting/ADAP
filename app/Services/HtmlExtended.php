<?php

namespace App\Services;

use Illuminate\Support\Str;
use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Label;
use Spatie\Html\Html;

class HtmlExtended extends Html
{
    public function yesNoRadio($name = null, $model = null)
    {
        return Div::create()->addChildren(
            Div::create()->class('form-check form-check-inline')
                ->addChildren($this->radio($name)->class('form-check-input')->id($name.'_yes')->value(1)->checked(old($name) === '1' || $model[$name] === 1))
                ->addChildren($this->label('Yes')->for($name.'_yes')->class('form-check-label'))
        )->addChildren(
            Div::create()->class('form-check form-check-inline')
                ->addChildren($this->radio($name)->class('form-check-input')->id($name.'_no')->value(0)->checked(old($name) === '0' || $model[$name] === 0))
                ->addChildren($this->label('No')->for($name.'_no')->class('form-check-label'))
        );
    }

    public function bootTextArea($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->textarea($name, $value)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootText($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->text($name, $value)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootPassword($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->password($name)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootDate($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'mask': '99/99/9999'";
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->date($name, $value)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootDateTime($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'mask': '99/99/9999 99:99 ([AaPp][Mm])'";
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->datetime($name, $value)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootTime($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'mask': '99:99 ([AaPp][Mm])'";
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->time($name, $value)->class('form-control')->attributes($attributes);

        return Div::create()->addChildren([$label, $input]);
    }

    public function bootPhone($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'mask': '(999)-999-9999'";

        return $this->bootText($name, $value, $labelName, $attributes, $required);
    }

    public function bootSSN($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'mask': '999-99-9999'";

        return $this->bootText($name, $value, $labelName, $attributes, $required);
    }

    public function numeric($name = null, $value = null, $labelName = null, $attributes = [], $required = null)
    {
        $attributes['data-inputmask'] = "'alias': 'numeric', 'showMaskOnHover': 'false', 'showMaskOnFocus': 'false'";

        return $this->bootText($name, $value, $labelName, $attributes, $required);
    }

    public function bootSelect($name = null, $options = [], $value = null, $labelName = null, $attributes = [], $required = null)
    {
        array_push($attributes, $attributes);
        $label = $this->buildLabel($name, $labelName, $required);
        $select = $this->select($name, $options, $value)->addClass('form-control');

        return Div::create()->addChildren([$label, $select]);
    }

    public function bootMultiSelect($name = null, $options = [], $value = null, $labelName = null, $attributes = [], $required = null)
    {
        array_push($attributes, $attributes);
        $label = $this->buildLabel($name, $labelName, $required);
        $select = $this->multiselect($name, $options, $value)->addClass('selectpicker form-control');

        return Div::create()->addChildren([$label, $select]);
    }

    public function bootFile($name = null, $labelName = null, $attributes = [], $required = null)
    {
        array_push($attributes, $attributes);
        $label = $this->buildLabel($name, $labelName, $required);
        $input = $this->file($name)->class('form-control');

        return Div::create()->addChildren([$label, $input]);
    }

    private function buildLabel($name = null, $labelName = null, $required = null): Label
    {
        if (is_null($labelName)) {
            $labelName = Str::headline($name);
        }
        if (! is_null($required) && $required == true) {
            $labelName .= ' <span class="text-danger">*</span>';
        }

        return $this->label($labelName, $name)->addClass('form-label');
    }
}
