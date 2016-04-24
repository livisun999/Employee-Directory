<?php
namespace App\Exceptions;
use Exception;

class CustomException extends Exception {
	protected $data;
    protected $message;
	protected $status;
	protected $status_code;
	protected $is_handle;

	public function __construct($msg, $code = 500){
		$this->message = $msg;
		$this->status_code = $code;
		$this->status = "error";
		$this->is_handle = false;
        $this->data = null;
	}

    public function data($d){
        $this->data = $d;
        return $this;
    }

    public function hasData(){
        return isset($this->data);
    } 

    public function getData(){
        return $this->data;
    }
   
    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this->status;
    }

    /**
     * Gets the value of status_code.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Sets the value of status_code.
     *
     * @param mixed $status_code the status code
     *
     * @return self
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this->status_code;
    }

    /**
     * Gets the value of is_handle.
     *
     * @return mixed
     */
    public function isHandle()
    {
        return $this->is_handle;
    }

    /**
     * Sets the value of is_handle.
     *
     * @param mixed $is_handle the is handle
     *
     * @return self
     */
    protected function handle()
    {
        $this->is_handle = true;

        return $this->is_handle;
    }
}