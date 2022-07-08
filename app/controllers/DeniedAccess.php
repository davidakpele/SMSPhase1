<?php

Class DeniedAccess extends Controller
{
    function index()
    {
        $data['page_title'] = "Access Denied";
        $this->view("DeniedAccess", $data);
    }
}