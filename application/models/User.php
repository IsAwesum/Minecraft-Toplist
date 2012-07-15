<?php

class User extends Eloquent {
 
     public function website()
     {
          return $this->has_one('Website', 'owner');
     }
 
}