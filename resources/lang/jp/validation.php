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

    'accepted'             => ':attribute はアクセプトしなければなりません。',
    'active_url'           => ':attribute は有効なURLではありません。',
    'after'                => ':attribute は:date の後の日付でなければなりません',
    'alpha'                => ':attribute は文字のみを含んでいてもよいです。',
    'alpha_dash'           => ':attribute は文字、数字とダッシュのみを含んでいても良いです。',
    'alpha_num'            => ':attribute は文字と数字のみを含んでいても良いです。',
    'array'                => ':attribute は配列でなければなりません。',
    'before'               => ':attribute は:dateの前の日付でなければなりません。',
    'between'              => [
        'numeric' => ':attribute は :min と :maxの間でなければなりません。',
        'file'    => ':attribute は :min と :maxの間のキロバイトでなければなりません。 ',
        'string'  => ':attribute は :min と :maxの間のキァッラクターでなければなりません。',
        'array'   => ':attribute は :min と :maxの間のアイテムでなければなりません。',
    ],
    'boolean'              => ':attribute フィールドは true または false でなければなりません。',
    'confirmed'            => ':attribute を一致していません。',
    'date'                 => ':attribute は無効な日付です。',
    'date_format'          => ':attribute は :format というフォマットに一致していません。',
    'different'            => ':attribute と :other は異なっている必要があります。',
    'digits'               => ':attribute は :digits という数字でなければなりません。',
    'digits_between'       => ':attribute は :min と :max の間の数字でなければなりません。',
    'dimensions'           => ':attribute は無効なイメージの寸法を有します。',
    'distinct'             => ':attribute フィールドの値は重複しています。',
    'email'                => ':attribute は有効なeメールアドレスでなければなりません。',
    'exists'               => '選択した :attribute は無効です。',
    'file'                 => ':attribute はファイルでなければなりません。',
    'filled'               => ':attribute フィールドは必須です。',
    'image'                => ':attribute はイメージでなければなりません。',
    'in'                   => '選択した :attribute は無効です。',
    'in_array'             => ':attribute フィールドは :other に存在していません。',
    'integer'              => ':attribute は整数でなければなりません。',
    'ip'                   => ':attribute は有効なIPアドレスでなければなりません。',
    'json'                 => ':attribute は JSON ストリングでなければなりません。',
    'max'                  => [
        'numeric' => ':attribute は :max 以下でなければなりません。',
        'file'    => ':attribute は :max キロバイル以下でなければなりません。',
        'string'  => ':attribute は :max キャラックター以下でなければなりません。',
        'array'   => ':attribute は :maxよりアイテムがあるかもしれません。',
    ],
    'mimes'                => ':attribute はファイルまたは type: :values でなければなりません。',
    'mimetypes'            => ':attribute はファイルまたは type: :values でなければなりません。',
    'min'                  => [
        'numeric' => ':attribute は少なくとも :min でなければなりません。',
        'file'    => ':attribute は少なくとも :min キロバイトでなければなりません。',
        'string'  => ':attribute は少なくとも :min キャラックターでなければなりません。',
        'array'   => ':attribute は少なくとも :min アイテムでなければなりません。',
    ],
    'not_in'               => '選択した :attribute は無効です。',
    'numeric'              => ':attribute はナンバーでなければなりません。',
    'present'              => ':attribute フィールドが存在しなければなりません。',
    'regex'                => ':attribute フォマットは無効です。',
    'required'             => ':attribute フィールドは必須です。',
    'required_if'          => ':other は :value になる場合は :attribute というフィールドが必須になります。',
    'required_unless'      => ':other は :value ではなくなる場合は :attribute というフィールドが必須になります。',
    'required_with'        => ':values は存在になる場合は :attribute というフィールドが必須になります。',
    'required_with_all'    => ':values は存在になる場合は :attribute というフィールドが必須になります。',
    'required_without'     => ':values は存在しなくなる場合は :attribute というフィールドが必須になります。',
    'required_without_all' => ':values の無しは存在する場合は :attribute というフィールドが必須になります。',
    'same'                 => ':attribute と :other は一致しなければなりません。',
    'size'                 => [
        'numeric' => ':attribute は :size でなければなりません。',
        'file'    => ':attribute は :size キロバイトでなければなりません。',
        'string'  => ':attribute は :size キャラクターでなければなりません。',
        'array'   => ':attribute は :size アイテムを含まなければなりません。',
    ],
    'string'               => ':attribute はストリングでなければなりません。',
    'timezone'             => ':attribute は有効なゾーンでなければなりません。',
    'unique'               => ':attribute はすでに使用しています。',
    'uploaded'             => ':attribute はアップロードできませんでした。',
    'url'                  => ':attribute フォマットは無効です。',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'password' => 'パスワード',
        'email' => 'メール',
        'name' => '名前',
        'content' => 'コンテンツ',
    ],

];
