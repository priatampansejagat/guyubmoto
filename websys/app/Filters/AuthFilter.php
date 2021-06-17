<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // CEK SESSION
        $session = \Config\Services::session();

        $encoded_data_login = json_encode($session->get('data_login'));
        $data_login = json_decode($encoded_data_login,true);

        if (isset($data_login['status'])) {
          if ($data_login['status'] == 'true') {

            // Cek level
            switch ($data_login['level']) {
              case '1':
                return redirect()->to(base_url().'/admin');
                break;

              case '2':
                return redirect()->to(base_url().'/admin');
                break;

              case '3':
                
                break;

              default:
                // Worst case, dia berhasil login tapi levelnya gak ada. BISA JADI KENA PENETRATE
                $this->session->destroy();
                return redirect()->to(base_url().'/auth');
                break;
            }

          }else {
            return redirect()->to(base_url().'/auth');
          }
        }else {
          return redirect()->to(base_url().'/auth');
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

?>
