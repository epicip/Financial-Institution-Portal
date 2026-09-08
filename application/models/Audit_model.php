<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Audit_model extends My_Model
{
    private $table = 'fi_portal_audit_logs';

    public function log_event($action, $entity_type, $entity_id, $description)
    {

        $data = array(
            'institution_id' => $this->session->userdata('fc_session_institution_id'),
            'actor_user_id' => $this->session->userdata('fc_session_user_id'),
            'actor_name' => (string) $this->session->userdata('fc_session_user_name'),
            'actor_type' => (string) $this->session->userdata('fc_session_user_type'),
            'action' => $action,
            'entity_type' => $entity_type,
            'entity_id' => (string) $entity_id,
            'description' => $description,
            'ip_address' => $this->input->ip_address(),
            'created_at' => date('Y-m-d H:i:s'),
        );

        return $this->db->insert($this->table, $data);
    }

    public function get_logs_for_current_institution()
    {

        $this->db->from($this->table);
        $this->db->where(
            'institution_id',
            $this->session->userdata('fc_session_institution_id')
        );
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        if ($query === false) {
            return array();
        }

        return $query->result();
    }
}
