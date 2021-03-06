<?php

require_once 'config.php';

class Database {

    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function auth($user, $pass)
    {
        try {
            $stmt = $this->executeStatementAuth(
                'SELECT * FROM usuario WHERE username = ? AND password = ?' , $user, $pass
            );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function getControlById($controlId)
    {
        try {
            $stmt = $this->executeStatement(
                'SELECT * FROM control WHERE idcontrol = ?', $controlId
            );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function deleteControl($controlId)
    {
        try {
            $stmt = $this->executeStatement( "DELETE FROM control WHERE idcontrol = ?" , ['i', $controlId] );
            if ($stmt) {
                return true;
            }
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function registerControl($query, $fecha,$profesional,$especializacion,$observacion,$params = [])
    {
       try {
            $stmt = $this->executeStatementRegister(  $query,$fecha,$profesional,$especializacion,$observacion,$params);
             if ($stmt) {
                return true;
            }
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
           

        return false;
    }

    private function executeStatementAuth($query, $user, $pass)
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            $stmt->bind_param("ss", $user, $pass);

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    private function executeStatementRegister($query, $fecha,$profesional,$especializacion,$observacion,$params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            $stmt->bind_param("ssssi", $fecha,$profesional,$especializacion,$observacion,$params[0]);

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    private function executeStatement($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if ($params) {
                $stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

}