<?php namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\UserInterface;

use DB;
use Carbon\Carbon;

class EloquentUser implements UserInterface

{

  /**
   * Eloquent model
   *
   * @var Illuminate\Database\Eloquent\Model
   */

  protected $user;

  public function __construct( Model $user )
  {

    $this->user = $user;

  }

  public function all(){

    return $this->user->get();

  }

  public function fetch(){

    return $this->user->get();

  }

  public function findById($id){

    $search = [
        'id' => $id
    ];

    return $this->search([], $search, true);

  }

  public function findByUsername($username){

    $field = [
        'users.username'
    ];

    $search = [
        'username' => $username
    ];

    return $this->search([], $search, true);

  }

  public function search($fields = [], $search = [], $first = false){

    $user = $this->user;

    if( count($fields) > 0 ){
      $user = $user->select($fields);
    }

    foreach( $search as $key => $value ){
      $user = $user->where($key,'=', $value);
    }
             
    return ( $user->count() > 0 )? ( $first )? $user->first() : $user->get() : false;                        

  }

  public function insert($data){

    return $this->user->insert($data);
  }

  public function update($id, $data){

    return $this->user
                ->where('id','=',$id)
                ->update($data);

  }

  public function delete($id){

    return $this->user
                ->where('id','=',$id)
                ->delete();

  }

  public function deleteMulti($ids){

    return $this->user
                ->whereIn('id', $ids)
                ->delete();

  }


}