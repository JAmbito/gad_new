<div class="text-center">
    <button class="btn btn-info btn-fit" onclick="faker('personal-info')">Fake personal</button>
    <button class="btn btn-info btn-fit" onclick="faker('family-background')">Fake family</button>
    <button class="btn btn-info btn-fit" onclick="faker('family_children_table_id')">Fake children</button>
    <button class="btn btn-info btn-fit" onclick="faker('educational-background')">Fake education</button>
    <button class="btn btn-info btn-fit" onclick="faker('civil-service-eligibility')">Fake civil service</button>
    <button class="btn btn-info btn-fit" onclick="faker('work-experience')">Fake work experience</button>
    <button class="btn btn-info btn-fit" onclick="faker('voluntary-work')">Fake voluntary work</button>
    <button class="btn btn-info btn-fit" onclick="faker('learning-and-development')">Fake learning and development</button>
    <button class="btn btn-info btn-fit" onclick="faker('other-information')">Fake other information</button>
</div>

<script>
    function faker(containerId) {
        $( `#${containerId}` ).fakify();
    }
</script>
