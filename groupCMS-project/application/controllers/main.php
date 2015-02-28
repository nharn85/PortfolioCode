<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
//        $this->load->database();
//        $this->load->helper('url');
        /* ------------------ */

        $this->load->library('grocery_CRUD');

    }

    public function index()
    {
        echo "<h1>you are at the index method</h1>";//Just an example to ensure that we get into the function
        die();
    }


    public function articles()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('article');
        $crud->set_subject('Article');

        $crud->set_relation('created_by', 'users', 'username');
        $crud->set_relation('last_modified_by', 'users', 'username');
        $crud->set_relation('pages_page_id', 'pages', 'title');
        $crud->set_relation('content_content_id', 'content', 'area');

        $crud->unset_delete();

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function content()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('content');
        $crud->set_subject('Content Area');

        $crud->set_relation('created_by', 'users', 'username');
        $crud->set_relation('last_modified_by', 'users', 'username');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function pages()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('pages');
        $crud->set_subject('Page');

        $crud->set_relation('created_by', 'users', 'username');
        $crud->set_relation('last_modified_by', 'users', 'username');

//        $crud->field_type('created_by', 'readonly');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function templates()
    {

        $crud = new grocery_CRUD();

        $crud->set_table('templates');
        $crud->set_subject('Template');

        $crud->set_relation('created_by', 'users', 'username');
        $crud->set_relation('modified_by', 'users', 'username');

        $crud->unset_texteditor('css','full_text');

        $output = $crud->render();

        $this->_example_output($output);


    }

    public function users()
    {

        $crud = new grocery_CRUD();

        $crud->set_table('users');
        $crud->set_subject('User');

        $crud->set_relation('created_by', 'users', 'username');
        $crud->set_relation('last_modified_by', 'users', 'username');
        $crud->set_relation_n_n('Permissions', 'permissions_has_users', 'permissions', 'users_user_id', 'permissions_permissions_id', 'name');

        $output = $crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null)

    {
        $this->load->view('our_template.php',$output);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */