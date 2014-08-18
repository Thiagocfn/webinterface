<?php
echo $this->Form->create("Integracoes", array());
echo $this->Form->input("Integracoes.AppSistemas.RoomList.file");
echo $this->Form->end("Update");
?>
<div class="input text">
    <fieldset>
        <legend>integracoes.php</legend>
        <pre>
            <?php echo $conteudo; ?>
        </pre>
    </fieldset>
</div>