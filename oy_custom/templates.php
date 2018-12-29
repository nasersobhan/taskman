<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




    $action_btns = '<div class="btn-group" role="group" aria-label="Allowed Action">
  <a href="' . get_link($pg_n, 'edit', '{ID}') . '" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
  <a href="' . get_link($pg_n, 'sus', '{ID}') . '"class="btn btn-default btn-sm btn-warning"><i class="glyphicon glyphicon-ban-circle"></i></a>
  <a href="' . get_link($pg_n, 'del', '{ID}') . '" class="btn btn-default btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
</div>';
    $action_btns2 = '<div class="btn-group" role="group" aria-label="Allowed Action">
  <a href="' . get_link($pg_n, 'edit', '{ID}') . '" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
  <a href="' . get_link($pg_n, 'act', '{ID}') . '"class="btn btn-default btn-sm btn-success"><i class="glyphicon glyphicon-ok-circle"></i></a>
  <a href="' . get_link($pg_n, 'del', '{ID}') . '" class="btn btn-default btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
</div>';
    
    
    