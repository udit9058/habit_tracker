$(document).ready(function() {
    loadHabits();

    $('#habit-form').on('submit', function(e) {
        e.preventDefault();
        const habit = $('#habit').val();
        if (habit) {
            $.post('php/add_habit.php', { habit: habit }, function(response) {
                $('#habit').val('');
                loadHabits();
            });
        }
    });

    function loadHabits() {
        $.get('php/get_habits.php', function(data) {
            $('#habit-list').html(data);
        });
    }

    $(document).on('click', '.update-habit', function() {
        const id = $(this).data('id');
        const status = $(this).data('status');
        $.post('php/update_habit.php', { id: id, status: status }, function(response) {
            loadHabits();
        });
    });
});





// From here insert.html code script start

$(document).ready(function() {
    loadHabits();

    $('#habit-form').on('submit', function(e) {
        e.preventDefault();
        const habit_name = $('#habit_name').val();
        const time_limit = $('#time_limit').val();
        const from_time = $('#from_time').val();
        const to_time = $('#to_time').val();
        const activity_date = $('#activity_date').val();
        if (habit_name && time_limit && from_time && to_time && activity_date) {
            $.post('php/add_habit.php', { habit_name: habit_name, time_limit: time_limit, from_time: from_time, to_time: to_time, activity_date: activity_date }, function(response) {
                $('#habit_name').val('');
                $('#time_limit').val('');
                $('#from_time').val('');
                $('#to_time').val('');
                $('#activity_date').val('');
                loadHabits();
            });
        }
    });

    function loadHabits() {
        $.get('php/get_habits.php', function(data) {
            $('#habit-list').html(data);
        });
    }

    $(document).on('click', '.update-habit', function() {
        const id = $(this).data('id');
        const status = $(this).data('status');
        $.post('php/update_habit.php', { id: id, status: status }, function(response) {
            loadHabits();
        });
    });
});




// Ensure the script loads habits and handles form actions correctly.

$(document).ready(function() {
    loadHabits();

    $('#completion_date').attr('min', new Date().toISOString().split('T')[0]);

    $('#habit_name').on('change', function() {
        const habitId = $(this).val();
        if (habitId) {
            $.get('php/get_habit_details.php', { id: habitId }, function(data) {
                const habit = JSON.parse(data);
                $('#time_limit').val(habit.time_limit);
                $('#from_time').val(habit.from_time);
                $('#to_time').val(habit.to_time);
            });
        } else {
            $('#time_limit').val('');
            $('#from_time').val('');
            $('#to_time').val('');
        }
    });

    function loadHabits() {
        $.get('php/get_habits_list.php', function(data) {
            $('#habit_name').html(data);
        });
    }
});
