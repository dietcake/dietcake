<?php
class Model
{
    public $id;
    public $validation;
    public $validation_errors;

    public function __construct(array $data = array())
    {
        $this->set($data);
    }

    /**
     * メンバの値をセットする
     *
     * 複数のメンバの値を一度にセットできます。
     *
     */
    public function set(array $data)
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
    }

    /**
     * メンバの値が正しいか検証する
     *
     * @return boolean 正しいとき true、それ以外のとき false
     */
    public function validate()
    {
        $members = get_object_vars($this);
        unset($members['validation']);
        unset($members['validation_errors']);

        $errors = 0;
        foreach ($members as $member => $v) {
            if (!isset($this->validation[$member])) continue;
            foreach ($this->validation[$member] as $rule_name => $args) {
                $validate_func = array_shift($args);
                if (method_exists($this, $validate_func)) {
                    // 検証メソッドがモデルに存在するとき実行
                    $valid = call_user_func_array(array($this, $validate_func), array_merge(array($v), $args));
                } elseif (function_exists($validate_func)) {
                    $valid = call_user_func_array($validate_func, array_merge(array($v), $args));
                } else {
                    // 存在しない検証メソッドのときエラー
                    throw new DCException("{$validate_func} does not exist");
                }
                $this->validation_errors[$member][$rule_name] = $valid ? false : true;
                if (!$valid) {
                    $errors++;
                }
            }
        }
        return $errors === 0 ? true : false;
    }

    /**
     * メンバの値にエラーがあるか調べる
     *
     * @return boolean エラーがあるとき true、それ以外のとき false
     */
    public function hasError()
    {
        if (empty($this->validation_errors)) return false;
        foreach ($this->validation_errors as $v) {
            foreach ($v as $w) {
                if ($w) return true;
            }
        }
        return false;
    }
}
