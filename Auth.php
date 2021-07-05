<?php
require "DBController.php";
class Auth {
    function getStaffByID($staffid) {
        $db_handle = new DBController();
        $query = "Select * from counselor where staffid = ?";
        $result = $db_handle->runQuery($query, 's', array($staffid));
        return $result;
    }

    function getStudentByID($studentid) {
        $db_handle = new DBController();
        $query = "Select * from student where studentid = ?";
        $result = $db_handle->runQuery($query, 's', array($studentid));
        return $result;
    }

    function getStudentNameByID($studentid) {
        $db_handle = new DBController();
        $query = "Select name from student where studentid = ?";
        $result = $db_handle->runQuery($query, 's', array($studentid));
        return $result;
    }

function getStaffNameByID($staffid) {
        $db_handle = new DBController();
        $query = "Select name from counselor where staffid = ?";
        $result = $db_handle->runQuery($query, 's', array($staffid));
        return $result;
    }

	function getTokenByUserID($userid,$expired) {
	    $db_handle = new DBController();
	    $query = "Select * from tbl_token_auth where userid = ? and is_expired = ?";
	    $result = $db_handle->runQuery($query, 'si', array($userid, $expired));
	    return $result;
    }

    function markAsExpired($tokenId) {
        $db_handle = new DBController();
        $query = "UPDATE tbl_token_auth SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db_handle->update($query, 'ii', array($expired, $tokenId));
        return $result;
    }

    function insertToken($userid, $random_password_hash, $random_selector_hash, $expiry_date) {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_token_auth (userid, password_hash, selector_hash, expiry_date) values (?, ?, ?,?)";
        $result = $db_handle->insert($query, 'ssss', array($userid, $random_password_hash, $random_selector_hash, $expiry_date));
        return $result;
    }

    function update($query) {
        mysqli_query($this->conn,$query);
    }
}
?>
