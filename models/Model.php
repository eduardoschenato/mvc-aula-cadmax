<?php

namespace Model;

abstract class Model {

    abstract public function selectAll();

    abstract public function selectOne($id);

    abstract public function insert($vo);

    abstract public function update($vo);

    abstract public function delete($id);

}