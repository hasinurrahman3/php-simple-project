<?php 
class ErrorHandaler
{
	protected $errors = [];

	public function addError($error, $key = null)
	{
		if($key)
		{
			$this->errors[$key][] = $error;
		}
		else
		{
			$this->errors[] = $error;
		}
	}

	public function all($key = null)
	{
		return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
	}

	public function hasError()
	{
		return count($this->all()) ? true : false;
	}


	public function first($key)
	{
		return isset($this->all()[$key][0]) ? $this->all()[$key][0] : '';
	}
}