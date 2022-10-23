<?php
class TemplateBack
{
    protected $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    public function getSettingsValue($key)
    {
        $query = $this->_ci->db->get_where('tb_settings', ['key' => $key]);
        return $query->row()->value;
    }

    public function view($content, $data = null)
    {
        $data['web_title'] = $this->getSettingsValue('web_title');
        $data['web_desc'] = $this->getSettingsValue('web_desc');
        $data['web_icon'] = $this->getSettingsValue('web_icon');
        $data['web_logo'] = $this->getSettingsValue('web_logo');

        $data['mailer_alias']          = $this->getSettingsValue('mailer_alias');
        $data['mailer_connection']     = $this->getSettingsValue('mailer_connection');
        $data['mailer_port']           = $this->getSettingsValue('mailer_port'); #587;
        $data['mailer_host']           = $this->getSettingsValue('mailer_host'); #"smtp.gmail.com";
        $data['mailer_username']       = $this->getSettingsValue('mailer_username'); #"ngodingin.indonesia@gmail.com";
        $data['mailer_password']       = $this->getSettingsValue('mailer_password'); #"hxexyuauljnejjmq";

        $this->_ci->load->view('template/backend/header', $data);
        $this->_ci->load->view('template/alert', $data);
        $this->_ci->load->view('template/backend/sidebar', $data);
        $this->_ci->load->view('template/backend/navbar', $data);
        $this->_ci->load->view($content, $data);
        $this->_ci->load->view('template/backend/footer', $data);
    }
}
