<?php

  function parseTag($attributes) {
      $tag = '';
      foreach ($attributes as $key => $value) {
          $tag.= sprintf(' %s="%s"',$key, $value);
      }
      return $tag;
  }

  if (!function_exists('addCss')) {
      function addCss($path, $options = []) {
          $fmt = '<link rel="stylesheet" href="%s"%s>';
          $attributes = '';
          if (!empty($options)) {
              $attributes = parseTag($options);
          }
          printf($fmt, $path, $attributes);
      }
  }

  if (!function_exists('addJs')) {
      function addJs($path, $options = []) {
          $fmt = '<script type="text/javascript" src="%s"%s></script>';
          $attributes = '';
          if (!empty($options)) {
              $attributes = parseTag($options);
          }
          printf($fmt, $path, $attributes);
      }
  }

  if (!function_exists('addMeta')) {
      function addMeta( $attr = []) {
          $fmt = '<meta %s />';
          $attributes = '';
          if (!empty($attr)) {
              $attributes = parseTag($options);
          }
          printf($fmt,$attributes);
      }
  }

  if ( ! function_exists('show_right'))
  {
    function show_right($page = '', $log_error = TRUE)
    {
      $_error =& load_class('Exceptions', 'core');
      $_error->show_right($page, $log_error);
      exit(4); // EXIT_UNKNOWN_FILE
    }
  }

  function dateFromDb($string,$format='m/d/Y')
  {
    if($string == '' OR $string == '0000-00-00' OR $string == '1970-01-01' OR $string == NULL ) return '';
    return $date = date( $format ,strtotime( $string ));
  }

  function dateToDb($string)
  {
    return $date = date( 'Y-m-d',strtotime( $string ));
  }


  function getConfig( $item = NULL )
  {
    $CI = & get_instance();
    if( $item == NULL ) {
      return $CI->config->config;
    }
    if( isset($CI->config->config[$item]) ) return $CI->config->config[$item];
    return FALSE;
  }

  if( ! function_exists('debug') )
  {
    function debug( $data, $var_dump = NULL )
    {
      echo '<pre>';
      if( !empty($var_dump) )
      {
        print_r( var_dump( $data ) );
      }
      else
      {
        print_r($data);
      }
      die();
    }
  }

  if( ! function_exists('getMonth') )
  {
    function getMonth( $month = NULL )
    {
      $bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
       ];

       return $bulan[ (int) $month ];
    }
  }

  if( ! function_exists('getRomawi') )
  {
    function getRomawi( $month = NULL )
    {
      $bulan = [
        1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI',
        7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
       ];

       return $bulan[ (int) $month ];
    }
  }

  if( ! function_exists('getIndoDay') )
  {
    function getIndoDay( $day = NULL )
    {
      $hari = [
        'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
       ];

       return $hari[$day];
    }
  }

  if(! function_exists('insertData'))
  {
    function insertData( $data )
    {
      $CI =& get_instance();
      $key = $CI->config->config['desa'];
      return "AES_ENCRYPT('$data','$key')";
    }
  }

  function formatIndoDate($date)
  {
    if( $date == '' OR $date == '-' OR $date == '0000-00-00' OR $date == '1970-01-01' ){
      return '-';
    }
    return date('d',strtotime($date)) ." " .getMonth(date('m',strtotime($date))). " ". date('Y',strtotime($date));
  }




  if(! function_exists('getColumn'))
  {
    function getColumn( $data )
    {
      $CI =& get_instance();
      $key = $CI->config->config['desa'];
      return "AES_DECRYPT(`$data`,'$key') as ".$data;
    }
  }




  if(! function_exists('getAvatar'))
  {
    function getAvatar( $img = NULL )
    {
      if(empty($img)){
        return base_url(). UPLOAD_DIR. '/user.png';
      }
      return base_url() . UPLOAD_DIR. '/' . $img ;
    }
  }




  if(! function_exists('getProfile')){
    function getProfile()
    {
      $CI =& get_instance();
      $CI->session->userdata;
      return $CI->m_login->findId( $CI->session->userdata['id'] );
    }
  }




  if( ! function_exists('datetimesitemap') ) {
    function datetimesitemap( $date )
    {
      $date = date('Y-m-d\TH:i:s',strtotime($date));
      return $date;
    }
  }



  if( ! function_exists('getAdminUrl') ) {
    function getAdminUrl( $ext = NULL )
    {
      if(!empty($ext)) return base_url(getConfig('admin_module') ."/" . $ext );
      return base_url(getConfig('admin_module'));
    }
  }

  if( ! function_exists('getAssetsUrl') ) {
    function getAssetsUrl( $ext = NULL, $config = 'admin_assets' )
    {
      if(!empty($ext)) return base_url(getConfig('admin_assets') ."/" . $ext );
      return base_url(getConfig($config));
    }
  }

  if( ! function_exists('formGenerator') ) {
    function formGenerator( $desc = '', $name = '', $value = '', $ket_value = '', $ket_name = NULL )
    {
      $value_ya = ($value == 'ya') ? 'checked="cheked"' : '';
      $value_tidak = ($value == 'tidak') ? 'checked="cheked"' : '';
      if( $ket_name == NULL ) {
        $ket_name = $name."_ket";
      }

      $x = '<div class="container">
              <div class="row">
                <div class="col-md-6">
                  <p>'. $desc .'</p>
                </div>
                <div class="col-md-2">
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="'.$name.'" value="ya" class="selectgroup-input" '.$value_ya.'>
                        <span class="selectgroup-button">Ada/Ya</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="'.$name.'" value="tidak" class="selectgroup-input" '.$value_tidak.' >
                        <span class="selectgroup-button">Tidak</span>
                      </label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea name="'.$ket_name.'" rows="8" cols="80" class="form-control" placeholder="Keterangan">'.$ket_value.'</textarea>
                    </div>
                  </div>
                </div>
                <!-- col-md-4 -->
              </div>
          </div>';
      return $x;
    }
  }


?>
