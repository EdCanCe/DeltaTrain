const exerciseContainers = document.querySelectorAll('.exercise-container');

// Función para agregar un conjunto de ejercicios a la tabla
function addSetToTable(table) {
  const secondRow = table.querySelector('tr:nth-child(2)');
  if (!secondRow) {
    return; // salir de la función si no hay filas
  }
  const newRow = secondRow.cloneNode(true);
  const inputs = newRow.querySelectorAll('input');
  inputs.forEach(input => {
    input.value = '';
  });
  const removeButton = newRow.querySelector('.remove-set');
  removeButton.addEventListener('click', () => {
    newRow.remove();
  });
  table.appendChild(newRow);
}

// Controladores de eventos
exerciseContainers.forEach(container => {
  const addButton = container.querySelector('.add-set');
  const table = container.querySelector('.sets-table');
  addButton.addEventListener('click', () => {
    addSetToTable(table);
  });
});

let bodyExercises = document.querySelector('.exercises-container-container');
let addExerciseContainerDefault = document.querySelector('.add-exercise-container');
addExerciseContainerDefault.addEventListener('click', () => {
  let exerciseContainerDefault = '<div class="exercise-container">                   <button class="delete-exercise-btn">Eliminar</button>                   <h3>                     <input type="text">                     <span class="material-symbols-outlined">nutrition</span>                   </h3>                   <div>                     <h4 class="recipes-name">                       <input type="text" name="recipes-name" required>                       <span class="placeholder-input">Notas</span>                       <i class="input-line"></i>                       <span class="message"></span>                     </h4>                   </div>                   <table class="sets-table">                     <tr>                       <th>Serie</th>                       <th>Repeticiones</th>                       <th>Notas</th>                     </tr>                     <tr>                       <td><input type="text"></td>                       <td><input type="text"></td>                       <td><input type="text"></td>                       <td><button class="remove-set">Eliminar</button></td>                     </tr>                   </table>                   <button class="add-set">Agregar Serie</button>                 </div>';
  bodyExercises.insertAdjacentHTML('beforeend', exerciseContainerDefault);

  // Agregar controlador de eventos al botón "Eliminar Ejercicio"
  const deleteExerciseBtn = bodyExercises.lastElementChild.querySelector('.delete-exercise-btn');
  deleteExerciseBtn.addEventListener('click', () => {
    deleteExerciseBtn.closest('.exercise-container').remove();
  });

  // Agregar controladores de eventos al botón "Agregar Serie"
  const addButton = bodyExercises.lastElementChild.querySelector('.add-set');
  const table = bodyExercises.lastElementChild.querySelector('.sets-table');
  addButton.addEventListener('click', () => {
    addSetToTable(table);
  });
});
