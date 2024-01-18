$(document).ready(function () {
  // Example data (replace this with your actual user data)
  var users = [
    { id: 1, name: "John Doe", email: "john@example.com", role: "Admin" },
    { id: 2, name: "Jane Doe", email: "jane@example.com", role: "Editor" },
    // Add more user data as needed
  ];

  // Initialize DataTable
  var table = $("#userTable").DataTable({
    data: users,
    columns: [
      { data: "name" },
      { data: "email" },
      { data: "role" },
      {
        // New column for actions
        data: null,
        render: function (data, type, row) {
          return (
            '<div class="btn-group">' +
            '<button type="button" class="btn btn-secondary edit-btn" data-toggle="modal" data-target="#editUserModal" data-user-id="' +
            row.id +
            '"><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-danger delete-btn" data-user-id="' +
            row.id +
            '"><i class="fas fa-trash-alt"></i></button>' +
            "</div>"
          );
        },
      },
    ],
  });

  // Handle edit icon click
  $("#userTable tbody").on("click", ".edit-btn", function () {
    var userId = $(this).data("user-id");
    var selectedUser = users.find((user) => user.id === userId);

    // Populate the modal form with user data
    $("#editUserName").val(selectedUser.name);
    $("#editUserEmail").val(selectedUser.email);
    $("#editUserRole").val(selectedUser.role);
  });

  // Handle save changes button click in the modal
  $("#saveChangesBtn").click(function () {
    var userId = $(".edit-btn").data("user-id");
    var editedName = $("#editUserName").val();
    var editedEmail = $("#editUserEmail").val();
    var editedRole = $("#editUserRole").val();

    // Update the user data in the array and redraw the DataTable
    var selectedUserIndex = users.findIndex((user) => user.id === userId);
    users[selectedUserIndex].name = editedName;
    users[selectedUserIndex].email = editedEmail;
    users[selectedUserIndex].role = editedRole;
    table.clear().rows.add(users).draw();

    // Close the modal
    $("#editUserModal").modal("hide");
  });

  // Handle delete button click
  $("#userTable tbody").on("click", ".delete-btn", function () {
    var userId = $(this).data("user-id");

    // Remove the user from the array and redraw the DataTable
    users = users.filter((user) => user.id !== userId);
    table.clear().rows.add(users).draw();
  });
});
