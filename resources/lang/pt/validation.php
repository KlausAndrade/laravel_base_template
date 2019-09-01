<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'unique' => ':attribute já existe',
    'accepted' => ':attribute é aceito',
    'active_url' => ':attribute deve ser uma URL válida',
    'after' => 'O campo :attribute deve ser após :date',
    'alpha' => ':attribute pode conter apenas letras ',
    'alpha_dash' => ':attribute  pode conter apenas letras, números, traços e sublinhados ',
    'alpha_num' => ':attribute pode conter apenas letras e números',
    'array' => ':attribute deve ser um array.',
    'serfore' => ':attribute deve ser uma data antes de :date 之前的一个日期',
    'serfore_or_equal' => ':attribute deve ser uma data anterior ou igual a :date',
    'between' => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file' => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ser entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O :attribute campo deve ser verdadeiro ou falso.',
    'confirmed' => 'O :attribute confirmação não corresponde.',
    'date' => 'O :attribute não é uma data válidae.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não confere o formato :format.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits digitos.',
    'digits_between' => 'O :attribute deve ter entre :min e :max digits.',
    'dimensions' => 'A :attribute possui dimensções inválidas.',
    'distinct' => 'O :attribute campo tem valor duplicado.',
    'email' => 'O :attribute deve ser um email válido.',
    'exists' => 'O :attribute selecionado é valido.',
    'file' => 'O :attribute deve ser a arquivo.',
    'filled' => 'O :attribute campo deve ser preenchido.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
        'array' => 'O :attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior ou igual a :value.',
        'file' => 'O :attribute deve ser maior ou igual a :value kilobytes.',
        'string' => 'O :attribute deve ser maior ou igual a :value caracteres.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é invalido.',
    'in_array' => 'O :attribute campo não existem em :other.',
    'integer' => 'O :attribute deve ser um inteiro.',
    'ip' => 'O :attribute deve ser um IP válido.',
    'ipv4' => 'O :attribute deve ser a valid IPv4 address.',
    'ipv6' => 'O :attribute deve ser a valid IPv6 address.',
    'json' => 'O :attribute deve ser a valid JSON string.',
    'lt' => [
        'numeric' => 'O :attribute deve ser less than :value.',
        'file' => 'O :attribute deve ser less than :value kilobytes.',
        'string' => 'O :attribute deve ser less than :value caracteres.',
        'array' => 'O :attribute deve have less than :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser less than or equal :value.',
        'file' => 'O :attribute deve ser less than or equal :value kilobytes.',
        'string' => 'O :attribute deve ser less than or equal :value caracteres.',
        'array' => 'O :attribute deve not have more than :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute may not ser maior que :max.',
        'file' => 'O :attribute may not ser maior que :max kilobytes.',
        'string' => 'O :attribute may not ser maior que :max caracteres.',
        'array' => 'O :attribute may not have more than :max itens.',
    ],
    'mimes' => 'O :attribute deve ser a file of type: :values.',
    'mimetypes' => 'O :attribute deve ser a file of type: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser at least :min.',
        'file' => 'O :attribute deve ser at least :min kilobytes.',
        'string' => 'O :attribute deve ser at least :min caracteres.',
        'array' => 'O :attribute deve have at least :min itens.',
    ],
    'not_in' => 'O selected :attribute is invalid.',
    'not_regex' => 'O :attribute format is invalid.',
    'numeric' => 'O :attribute deve ser a numserr.',
    'present' => 'O :attribute campo deve ser present.',
    'regex' => 'O :attribute format is invalid.',
    'required' => 'O :attribute campo is required.',
    'required_if' => 'O :attribute campo is required when :other is :value.',
    'required_unless' => 'O :attribute campo is required unless :other is in :values.',
    'required_with' => 'O :attribute campo is required when :values is present.',
    'required_with_all' => 'O :attribute campo is required when :values are present.',
    'required_without' => 'O :attribute campo is required when :values is not present.',
    'required_without_all' => 'O :attribute campo is required when none of :values are present.',
    'same' => 'O :attribute e :other deve match.',
    'size' => [
        'numeric' => 'O :attribute deve ser :size.',
        'file' => 'O :attribute deve ser :size kilobytes.',
        'string' => 'O :attribute deve ser :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve start with one of the following: :values',
    'string' => 'O :attribute deve ser a string.',
    'timezone' => 'O :attribute deve ser a valid zone.',
    'unique' => 'O :attribute já está sendo utilizado.',
    'uploaded' => 'O :attribute failed to upload.',
    'url' => 'O :attribute formato é invalido.',
    'uuid' => 'O :attribute deve ser a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
