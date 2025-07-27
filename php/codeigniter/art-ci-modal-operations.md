
- [CodeIgniter Model Sınıfları ve Veritabanı İşlemleri](#codeigniter-model-sınıfları-ve-veritabanı-i̇şlemleri)
  - [Model Sınıfı Oluşturma](#model-sınıfı-oluşturma)
  - [Controller'da Model Kullanımı](#controllerda-model-kullanımı)
  - [Temel Veritabanı İşlemleri](#temel-veritabanı-i̇şlemleri)
    - [1. Veri Ekleme (Insert)](#1-veri-ekleme-insert)
    - [2. Veri Okuma (Select)](#2-veri-okuma-select)
    - [3. Veri Güncelleme (Update)](#3-veri-güncelleme-update)
    - [4. Veri Silme (Delete)](#4-veri-silme-delete)
  - [Gelişmiş Sorgular](#gelişmiş-sorgular)
  - [Query Builder Kullanımı](#query-builder-kullanımı)
  - [Validation ve Callbacks](#validation-ve-callbacks)
  - [Pagination](#pagination)
- [CodeIgniter Model Sorgu Loglarını Görüntüleme](#codeigniter-model-sorgu-loglarını-görüntüleme)
  - [1. Database Query Logging Aktifleştirme](#1-database-query-logging-aktifleştirme)
  - [2. Toolbar ile Sorguları Görme](#2-toolbar-ile-sorguları-görme)
  - [3. Manuel Sorgu Loglarını Alma](#3-manuel-sorgu-loglarını-alma)
  - [4. Query Builder ile Debug](#4-query-builder-ile-debug)
  - [5. Model İçinde Query Logging](#5-model-i̇çinde-query-logging)
  - [6. Custom Logger Oluşturma](#6-custom-logger-oluşturma)
  - [7. BaseController'da Global Logging](#7-basecontrollerda-global-logging)
  - [8. Specific Query Debug](#8-specific-query-debug)
  - [9. Environment Bazlı Logging](#9-environment-bazlı-logging)


codeigniter model sınıfları nasıl kullanılıyor, db işlemleri nelerdir

GitHub Copilot: 

# CodeIgniter Model Sınıfları ve Veritabanı İşlemleri

## Model Sınıfı Oluşturma

````php
<?php
// filepath: app/Models/UserModel.php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'ref_no', 'password', 'created_at'];
    //id	ref_no	full_name	price	customer_no	vergi_no	description	status	bank	installment_count	error_message	isEmail	response	createdAt
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[users.email]'
    ];
}
````

## Controller'da Model Kullanımı

````php
<?php
// filepath: app/Controllers/UserController.php
namespace App\Controllers;

class UserController extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        // veya
        $this->userModel = model('UserModel');
    }
    
    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('users/list', $data);
    }
}
````

## Temel Veritabanı İşlemleri

### 1. Veri Ekleme (Insert)

````php
// Tek kayıt ekleme
$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com'
];
$this->userModel->insert($data);

// Çoklu kayıt ekleme
$data = [
    ['name' => 'User1', 'email' => 'user1@example.com'],
    ['name' => 'User2', 'email' => 'user2@example.com']
];
$this->userModel->insertBatch($data);
````

### 2. Veri Okuma (Select)

````php
// Tüm kayıtları getir
$users = $this->userModel->findAll();

// ID ile kayıt getir
$user = $this->userModel->find(1);

// Şartlı sorgular
$users = $this->userModel->where('status', 'active')->findAll();
$users = $this->userModel->like('name', 'john')->findAll();

// Limit ve offset
$users = $this->userModel->limit(10, 0)->findAll();

// Sıralama
$users = $this->userModel->orderBy('created_at', 'DESC')->findAll();
````

### 3. Veri Güncelleme (Update)

````php
// ID ile güncelleme
$data = ['name' => 'Updated Name'];
$this->userModel->update(1, $data);

// Şartlı güncelleme
$this->userModel->where('status', 'inactive')
                ->set(['status' => 'active'])
                ->update();

// Çoklu güncelleme
$data = [
    ['id' => 1, 'name' => 'User1 Updated'],
    ['id' => 2, 'name' => 'User2 Updated']
];
$this->userModel->updateBatch($data, 'id');
````

### 4. Veri Silme (Delete)

````php
// ID ile silme
$this->userModel->delete(1);

// Çoklu silme
$this->userModel->delete([1, 2, 3]);

// Şartlı silme
$this->userModel->where('status', 'inactive')->delete();

// Soft delete (eğer tanımlanmışsa)
$this->userModel->delete(1, false); // hard delete
````

## Gelişmiş Sorgular

````php
// Join işlemleri
$users = $this->userModel
    ->select('users.*, profiles.bio')
    ->join('profiles', 'profiles.user_id = users.id', 'left')
    ->findAll();

// Group by ve Having
$result = $this->userModel
    ->select('status, COUNT(*) as count')
    ->groupBy('status')
    ->having('count >', 5)
    ->findAll();

// Raw sorgu
$users = $this->userModel
    ->where('DATE(created_at)', date('Y-m-d'))
    ->findAll();
````

## Query Builder Kullanımı

````php
$db = \Config\Database::connect();
$builder = $db->table('users');

// SELECT
$query = $builder->select('*')
                ->where('status', 'active')
                ->get();
$users = $query->getResultArray();

// INSERT
$data = ['name' => 'John', 'email' => 'john@example.com'];
$builder->insert($data);

// UPDATE
$builder->where('id', 1)
        ->update(['name' => 'Updated Name']);

// DELETE
$builder->where('id', 1)->delete();
````

## Validation ve Callbacks

````php
// Model içinde validation
protected $validationRules = [
    'email' => 'required|valid_email|is_unique[users.email,id,{id}]'
];

// Callback methods
protected function beforeInsert(array $data)
{
    $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    return $data;
}

protected function afterFind(array $data)
{
    // Veri bulunduktan sonra işlemler
    return $data;
}
````

## Pagination

````php
$pager = \Config\Services::pager();
$page = $this->request->getVar('page') ?? 1;
$perPage = 10;

$users = $this->userModel->paginate($perPage, 'default', $page);
$pager = $this->userModel->pager;

return view('users/list', [
    'users' => $users,
    'pager' => $pager
]);
````

Bu yapı ile CodeIgniter'da veritabanı işlemlerini güvenli ve verimli bir şekilde gerçekleştirebilirsiniz.

# CodeIgniter Model Sorgu Loglarını Görüntüleme

## 1. Database Query Logging Aktifleştirme

````php
public array $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'test',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => true, // Bu true olmalı
    'charset'  => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'swapPre'  => '',
    'encrypt'  => false,
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 3306,
];
````

## 2. Toolbar ile Sorguları Görme

````php
/Config/Filters.php
public array $globals = [
    'before' => [
        // ...existing code...
    ],
    'after' => [
        'toolbar', // Debug toolbar aktif olmalı
        // ...existing code...
    ],
];
````

````php
// Development ortamında toolbar otomatik aktif
ini_set('display_errors', '1');
error_reporting(E_ALL);

$app->setEnvironment('development');
````

## 3. Manuel Sorgu Loglarını Alma

````php
// Controller içinde sorgu sonrası
public function getUsers()
{
    $users = $this->userModel->findAll();
    
    // Son çalıştırılan sorguyu göster
    $db = \Config\Database::connect();
    echo $db->getLastQuery();
    
    // Tüm sorguları göster
    $queries = $db->getQueries();
    foreach ($queries as $query) {
        echo $query . "\n";
    }
    
    return view('users/list', ['users' => $users]);
}
````

## 4. Query Builder ile Debug

````php
$db = \Config\Database::connect();
$builder = $db->table('users');

$query = $builder->select('*')
                ->where('status', 'active')
                ->get();

// SQL sorgusunu string olarak al
$sql = $builder->getCompiledSelect();
echo $sql; // SELECT * FROM users WHERE status = 'active'

// Son sorguyu göster
echo $db->getLastQuery()->getQuery();
````

## 5. Model İçinde Query Logging

````php
class UserModel extends Model
{
    // ...existing code...
    
    public function getUsersWithLog()
    {
        $result = $this->findAll();
        
        // Sorguyu logla
        $db = $this->db;
        log_message('debug', 'SQL Query: ' . $db->getLastQuery());
        
        return $result;
    }
    
    public function debugQuery($method, ...$params)
    {
        $result = $this->$method(...$params);
        
        // Query'yi ekrana yazdır
        echo "<pre>";
        echo $this->db->getLastQuery();
        echo "</pre>";
        
        return $result;
    }
}
````

## 6. Custom Logger Oluşturma

````php
<?php
namespace App\Libraries;

class QueryLogger
{
    public static function logQuery($db)
    {
        $query = $db->getLastQuery();
        
        // Log dosyasına yaz
        $logData = [
            'query' => $query->getQuery(),
            'time' => date('Y-m-d H:i:s'),
            'execution_time' => $query->getDuration()
        ];
        
        log_message('debug', 'SQL: ' . json_encode($logData));
        
        // Ekrana yazdır (development ortamında)
        if (ENVIRONMENT === 'development') {
            echo "<div style='background:#f0f0f0;padding:10px;margin:5px;'>";
            echo "<strong>SQL:</strong> " . $query->getQuery() . "<br>";
            echo "<strong>Time:</strong> " . $query->getDuration() . "s";
            echo "</div>";
        }
    }
}
````

## 7. BaseController'da Global Logging

````php
abstract class BaseController extends Controller
{
    // ...existing code...
    
    protected function afterAction()
    {
        if (ENVIRONMENT === 'development') {
            $db = \Config\Database::connect();
            $queries = $db->getQueries();
            
            echo "<div style='position:fixed;bottom:0;left:0;right:0;background:rgba(0,0,0,0.8);color:white;padding:10px;max-height:200px;overflow-y:auto;'>";
            echo "<h4>SQL Queries (" . count($queries) . ")</h4>";
            foreach ($queries as $index => $query) {
                echo "<div style='margin:5px 0;padding:5px;background:rgba(255,255,255,0.1);'>";
                echo "<strong>" . ($index + 1) . ":</strong> " . $query;
                echo "</div>";
            }
            echo "</div>";
        }
    }
}
````

## 8. Specific Query Debug

````php
// Model metodunda
public function findUserById($id)
{
    // Query başlamadan önce debug aktifleştir
    $this->db->query("SET SESSION query_cache_type = OFF");
    
    $result = $this->find($id);
    
    // Query bilgilerini al
    $lastQuery = $this->db->getLastQuery();
    
    // Detaylı bilgi
    $queryInfo = [
        'sql' => $lastQuery->getQuery(),
        'duration' => $lastQuery->getDuration(),
        'result_count' => is_array($result) ? count($result) : (is_object($result) ? 1 : 0)
    ];
    
    log_message('debug', 'Query Info: ' . json_encode($queryInfo));
    
    return $result;
}
````

## 9. Environment Bazlı Logging

````php
public bool $debugToolbarEnabled = false;

// Development ortamında
if (ENVIRONMENT === 'development') {
    $debugToolbarEnabled = true;
}
````

Bu yöntemlerle CodeIgniter modellerinizin oluşturduğu SQL sorgularını detaylı bir şekilde takip edebilir ve debug işlemlerinizi kolaylaştırabilirsiniz.

Similar code found with 2 license types

