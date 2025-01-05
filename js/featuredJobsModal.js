document.addEventListener('DOMContentLoaded', function () {
  var modal = document.getElementById('jobModal');
  var span = document.getElementsByClassName('close')[0];

  span.onclick = function () {
    modal.style.display = 'none';
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  };

  var viewJobLinks = document.getElementsByClassName('view-job');
  for (var i = 0; i < viewJobLinks.length; i++) {
    viewJobLinks[i].addEventListener('click', function (event) {
      event.preventDefault();
      var jobId = this.getAttribute('data-job-id');
      var modalContent = document.getElementById('modal-job-details');
      fetch('../controllers/fetch-featured-jobs.php?job_id=' + jobId)
        .then((response) => response.text())
        .then((html) => {
          modalContent.innerHTML = html;
          modal.style.display = 'block';
        });
    });
  }
});
