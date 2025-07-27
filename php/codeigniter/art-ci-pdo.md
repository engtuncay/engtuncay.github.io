

# codeigniter 4 ile pdo objesi nasıl kullanılır

GitHub Copilot: CodeIgniter 4'te PDO objesi kullanmak için birkaç yöntem bulunmaktadır:

## 1. Database Konfigürasyonunda PDO Driver Kullanımı

**Database.php** dosyasında PDO driver'ını ayarlayın:

````php
public array $default = [
    'DSN'          => '',
    'hostname'     => 'localhost',
    'username'     => 'root',
    'password'     => '',
    'database'     => 'your_database',
    'DBDriver'     => 'PDO',
    'DBPrefix'     => '',
    'pConnect'     => false,
    'DBDebug'      => true,
    'charset'      => 'utf8',
    'DBCollat'     => 'utf8_general_ci',
    'swapPre'      => '',
    'encrypt'      => false,
    'compress'     => false,
    'strictOn'     => false,
    'failover'     => [],
    'port'         => 3306,
    'subdriver'    => 'mysql', // mysql, pgsql, sqlite, sqlsrv
];
````

## 2. Controller'da PDO Kullanımı

````php
/YourController.php
<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class YourController extends Controller
{
    public function index()
    {
        // Database servisini al
        $db = \Config\Database::connect();
        
        // PDO instance'ını al
        $pdo = $db->getPDO();
        
        // PDO ile sorgu çalıştır
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([1]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return view('your_view', ['data' => $result]);
    }
    
    public function insertData()
    {
        $db = \Config\Database::connect();
        $pdo = $db->getPDO();
        
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->execute(['John Doe', 'john@example.com']);
            
            echo "Veri başarıyla eklendi";
        } catch (\PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
}
````

## 3. Model'de PDO Kullanımı

````php
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    
    public function getUserWithPDO($userId)
    {
        $db = $this->db;
        $pdo = $db->getPDO();
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function customQuery()
    {
        $pdo = $this->db->getPDO();
        
        // Transaction kullanımı
        $pdo->beginTransaction();
        
        try {
            $stmt1 = $pdo->prepare("INSERT INTO users (name) VALUES (?)");
            $stmt1->execute(['User 1']);
            
            $stmt2 = $pdo->prepare("INSERT INTO profiles (user_id, bio) VALUES (?, ?)");
            $stmt2->execute([$pdo->lastInsertId(), 'Bio text']);
            
            $pdo->commit();
            return true;
        } catch (\Exception $e) {
            $pdo->rollback();
            return false;
        }
    }
}
````

## Önemli Notlar:

- PDO kullanırken `DBDriver` değerini `'PDO'` olarak ayarlayın
- `subdriver` parametresi ile hangi veritabanı türünü kullandığınızı belirtin
- PDO objesi `$db->getPDO()` metodu ile erişilebilir
- Prepared statements kullanarak SQL injection saldırılarından korunun
- Transaction işlemleri için PDO'nun kendi metodlarını kullanabilirsiniz

Bu şekilde CodeIgniter 4'te PDO objesini etkili bir şekilde kullanabilirsiniz.

Similar code found with 2 license types