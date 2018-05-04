<?php

class ActionForm
{
  /**
   *  Массив данных который пришел с формы методом POST.
   */
  private $a_data_post = [];
  
  /**
   *  Массив данных который пришел с формы методом GET.
   */
  private $a_data_get = [];
    
  /**
   * Установить данные пришедшие методом POST or GET.
   */
  public function setPostGet()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $this->a_data_post = $_POST;
    }
    
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
      $this->a_data_get = $_GET;
    }
  }
  
  /**
   * Получить данные из массива POST.
   *
   * @return array $a_data;
   */
  public function getPost()
  {
    return $this->a_data_post; 
  }
  
  /**
   * Получить данные из массива GET.
   *
   * @return array $a_data;
   */
  public function getGet()
  {
    return $this->a_data_get; 
  }  
}
  
?>