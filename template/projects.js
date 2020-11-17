// Receive and output awards
var LoadProjects = () => {
    GetAjaxData('db_projects.php');
    $(document).ajaxComplete(() => {
        let html = `
			<div class=" col-xs-12 col-sm-12">
	            <div class="p-20"></div>
		        <div class="block-title">
					<h2>Project</h2>
		        </div>
		`;

        if (object.length > 0) {
            object.forEach((e) => {
                html += `
				<div class=" col-xs-12 col-sm-12">
					<div class="testimonial-item" style="padding-bottom: 0px">
						<div class="testimonial-content" style="text-align: center; padding: 30px 20px 20px 30px">

							<div class="students-author-info">
								<h4 class="project-title">${e.title}</h4>
								<p>${e.place}</p>
								<p>Role: ${e.role}</p>
								<p>Duration: ${e.duration} (${e.date_start} - ${e.date_end})</p>
							</div>
						</div>
					</div>
				</div>
				`;
            });
        }
        html += '</div>';

        $('#data').html(html);
    });
};