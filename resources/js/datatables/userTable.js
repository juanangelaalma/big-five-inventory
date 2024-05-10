import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';

new DataTable('#userTable', {
  responsive: true,
  paging: false,
  info: false,
  language: {
    search: 'Cari '
  }
});