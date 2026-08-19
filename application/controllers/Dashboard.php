
	<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends My_Controller
	{

		/**
		 * Display the client dashboard with order statistics.
		 *
		 * This function retrieves active, total, and published client orders
		 * from the Users model, stores them in the data array, and loads
		 * the dashboard view with the retrieved information.
		 *
		 * @return void
		 */

		function index()
		{
			// View page link
			$this->load->view('dashboard', $this->data);
		}
	}
