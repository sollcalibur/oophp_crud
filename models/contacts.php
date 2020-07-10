<?php
class Contacts
{
    public static function fetchAll($input)
    {
        $pageNum = (int) $input['page'];
        $pageSize = (int) $input['limit'];
        $offset = ($pageNum - 1) * $pageSize;
        $data = null;

        $sql = "SELECT * FROM contacts ORDER BY contact_id ASC LIMIT :limit OFFSET :offset";
        $req = DB::getDbInstance()->prepare($sql);
        $req->bindParam(':limit', $pageSize, PDO::PARAM_INT);
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();

        $data['contacts'] = array();
        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
            array_push($data['contacts'], array(
                'contact_id' => $result['contact_id'],
                'contact_name' => $result['contact_name'],
                'contact_number' => $result['contact_number'],
                'contact_email' => $result['contact_email'],
                'contact_inserted_on' => $result['contact_inserted_on'],
                'contact_updated_on' => $result['contact_updated_on']
            ));
        }

        $total_count = self::getCountAll();
        $data['total_pages'] = ceil($total_count / $pageSize);
        $data['page'] = $pageNum;
        $data['limit'] = $pageSize;
        $data['offset'] = $offset;
        $data['redirect'] = $input['pagination_url'];

        if ($data['total_pages'] <= 10) {
            $data['start'] = 1;
            $data['end'] = $data['total_pages'];
        } else {
            $data['start'] = max(1, ($data['page'] - 4));
            $data['end'] = min($data['total_pages'], ($data['page'] + 5));

            if ($data['start'] === 1) {
                $data['end'] = 10;
            } elseif ($data['end'] === $data['total_pages']) {
                $data['start'] = ($data['total_pages'] - 9);
            }
        }

        return  $data;
    }

    public static function fetchOneById($id)
    {
        $data = null;
        $sql = "SELECT * FROM contacts WHERE contact_id = :contact_id LIMIT 1";
        $req = DB::getDbInstance()->prepare($sql);
        $req->bindParam(':contact_id', $id, PDO::PARAM_INT);
        if ($req->execute()) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                $data['contact_id'] = $result['contact_id'];
                $data['contact_name'] = $result['contact_name'];
                $data['contact_number'] = $result['contact_number'];
                $data['contact_email'] = $result['contact_email'];
            }
            return $data;
        } else {
            return $data;
        }
    }

    public static function updateById()
    {
        $sql = "UPDATE contacts
                    SET contact_name = CASE WHEN :contact_name = '' THEN contact_name ELSE :contact_name END, 
                    contact_number = CASE WHEN :contact_number = '' THEN contact_number ELSE :contact_number END, 
                    contact_email = CASE WHEN :contact_email = '' THEN contact_email ELSE :contact_email END,
                    contact_updated_on = :contact_updated_on
                WHERE contact_id = :contact_id";

        $req = DB::getDbInstance()->prepare($sql);
        $req->bindParam(':contact_name', $fullname, PDO::PARAM_STR);
        $req->bindParam(':contact_number', $username, PDO::PARAM_STR);
        $req->bindParam(':contact_email', $password, PDO::PARAM_STR);
        $req->bindParam(':contact_updated_on', $datetime_now, PDO::PARAM_STR);
        $req->bindParam(':contact_id', $user_id, PDO::PARAM_INT);
        if ($req->execute()) {
            if ($req->rowCount()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public static function deleteById()
    {
    }

    public static function create()
    {
    }

    public static function getCountAll()
    {
    }
}
