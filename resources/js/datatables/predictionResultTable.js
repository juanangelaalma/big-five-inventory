import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';
import language from 'datatables.net-plugins/i18n/id.mjs';

new DataTable('#predictionResultTable', {
  responsive: true,
  info: false,
  searching: false,
  language: {
    ...language,
    paginate: {}
  }
});