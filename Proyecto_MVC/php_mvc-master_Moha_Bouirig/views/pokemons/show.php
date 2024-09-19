<h3>Pokemons asociados al entrenador con id <?php echo $pokemon[0]->idEntrenador;  ?>:</h3>


<table>
    <thead>
        <th>Nombre</th>
        <th>Tipo</th>
    </thead>
    <tbody>
        <?php foreach ($pokemon as $pokemons) { ?>
            <tr>
                <td><?php echo $pokemons->nombrePokemon; ?></td>
                <td><?php echo $pokemons->tipo; ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>