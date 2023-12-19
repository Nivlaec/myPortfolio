document.addEventListener('DOMContentLoaded', function () {
    var recreationInfos = document.querySelectorAll('.recreation-info');

    recreationInfos.forEach(function (info) {
        info.addEventListener('click', function () {
            toggleDetails(info);
        });
    });

    function toggleDetails(info) {
        var details = info.querySelector('.additional-details');

        if (!details) {
            details = document.createElement('div');
            details.className = 'additional-details';
            details.innerHTML = '<p>Additional details here...</p>';
            info.appendChild(details);
        } else {
            details.parentNode.removeChild(details);
        }
    }
});
