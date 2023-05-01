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
    let exerciseContainerDefault = '<div class="exercise-container"><button type="button" class="delete-exercise-btn"><span class="material-symbols-outlined icon">close</span></button><h3><input type="text" class="exercise-name" name="name-exercise" onkeyup="checkExercise()" required><label for="name-exercise">Nombre del Ejercicio</label></h3><div><h4 class="notes-exercise-container"><textarea name="notes-exercise" class="exercise-notes" cols="30" rows="10" style="resize:vertical;" onkeyup="checkExercise()" required></textarea><label class="placeholder-input">Notas</label></h4></div><table class="sets-table"><tr><th>Serie</th><th>Repeticiones</th><th>Notas</th></tr><tr><td><input type="text" onkeyup="checkExercise()"></td><td><input type="text" onkeyup="checkExercise()"></td><td><input type="text" onkeyup="checkExercise()"></td><td><button type="button" class="remove-set"><span class="material-symbols-outlined icon">close</span></button></td></tr></table><button class="add-set" type="button"><span class="material-symbols-outlined icon">add</span></button></div>';
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





function checkExercise(){
    let divs = document.querySelectorAll('.exercise-container');
    let totalData = "";
    divs.forEach(exer => {
        let exerciseData = "";
        let exerciseName = exer.querySelector('[name="name-exercise"]');
        let exerciseDesc = exer.querySelector('[name="notes-exercise"]');
        let exerciseTables = "";
        let tables = exer.querySelectorAll('td input[type="text"]');
        tables.forEach(table => {
            exerciseTables = exerciseTables + table.value + "|";
        });
        exerciseData = exerciseName.value + "<" + exerciseDesc.value + "<" + exerciseTables;
        totalData = totalData + exerciseData + ">";
    });
    console.log(totalData);
    document.getElementById("hiddenExercise").innerHTML=totalData;
}