<?php

namespace App\Models;

use CodeIgniter\Model;


/**
 * Description of Settingproducts_model
 *
 * @author ICT-Notebook
 */
class Salesorder_model extends Model
{

    //protected $table = 'ARCUS';
    function __construct()
    {
        parent::__construct();
    }



    function list_contract_open()
    {
        $query = $this->db->query("select a.CTUNIQ,a.CONTRACT,a." . '"DESC"' . ",a.CUSTOMER,b.NAMECUST,a.MANAGER,c." . '"NAME"' . " from PMCONTS a "
            . "left join ARCUS b on b.IDCUST=a.CUSTOMER "
            . "left join PMSTAFF c on c.STAFFCODE=a.MANAGER "
            . "where a.STATUS=30 and a.CUSTOMER<>'' and a.CONTRACT NOT IN (select ContractNo from webot_ORDERTRACKING) ");

        if ($query->getResult() > 0) {
            /*foreach ($query->getResultArray() as $row) {
                $data[0] = '--SELECT CONTRACT--';
                $data[trim($row['CONTRACT'])] = '(' . trim($row['CONTRACT']) . ') ' . $row['DESC'] . ' - ' . $row['NAMECUST'];
            }
        }
        return $data;*/
            return $query->getResultArray();
        }
    }

    function list_project_by_contract($contract)
    {
        $query = $this->db->query("select a.PROJECT,a." . '"DESC"' . " as Prj_Desc,a.PONUMBER,a.STARTDATE as PODATE
            from PMPROJS a where a.CONTRACT='$contract' ");
        if ($query->getResult() > 0) {
            return $query->getResultArray();
        }
    }

    function get_contract_by_id($ct_no)
    {
        $query = $this->db->query("select a.CTUNIQ,a.CONTRACT,a." . '"DESC"' . ",a.CUSTOMER,b.NAMECUST,b.EMAIL1,b.EMAIL2,a.MANAGER,c." . '"NAME"' . " from PMCONTS a "
            . "left join ARCUS b on b.IDCUST=a.CUSTOMER "
            . "left join PMSTAFF c on c.STAFFCODE=a.MANAGER "
            . "where a.CONTRACT='$ct_no' ");
        return $query->getRowArray();
    }

    function get_project_by_contract($ct_no, $prj_no)
    {
        $query = $this->db->query("select a.CTUNIQ,x.CONTRACT,a." . '"DESC"' . ",a.CUSTOMER,b.NAMECUST,b.EMAIL1,b.EMAIL2,a.MANAGER,c." . '"NAME"' . ",x.PROJECT,x." . '"DESC"' . " as Prj_Desc,x.PONUMBER,x.STARTDATE as PODATE "
            . "from PMPROJS x "
            . "left join PMCONTS a on a.CONTRACT=x.CONTRACT "
            . "left join ARCUS b on b.IDCUST=a.CUSTOMER "
            . "left join PMSTAFF c on c.STAFFCODE=a.MANAGER "
            . "where x.CONTRACT='$ct_no' and x.PROJECT='$prj_no' ");
        return $query->getRowArray();
    }

    function get_so_open()
    {
        $query = $this->db->query("select * from webot_ORDERTRACKING where PrNumber IS NULL");
        return $query->getResultArray();
    }

    function get_icitem()
    {
        $query = $this->db->query("select ITEMNO," . '"DESC"' . " as ITEMDESC,COMMENT1,COMMENT2,COMMENT3,COMMENT4 from ICITEM where INACTIVE=0");
        return $query->getResultArray();
    }

    function so_insert($data)
    {
        $query = $this->db->table('webot_ORDERTRACKING')->insert($data);
        return $query;
    }

    function mailbox_insert($data_notif)
    {
        $query = $this->db->table('webot_MAILBOX')->insert($data_notif);
        return $query;
    }
}
