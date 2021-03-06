<?php
/**
 * Admin settings template for plug-in wide settings
 */

$mapdata = \Idno\Core\Idno::site()->config()->fitness['mapdata'];
if (empty($mapdata)) { $mapdata = 'osm'; }

$weight = \Idno\Core\Idno::site()->config()->fitness['weight'];
if (empty($weight)) { $weight = '98%'; }

$height = \Idno\Core\Idno::site()->config()->fitness['height'];
if (empty($height)) { $height = '300px'; }
?>

<div class="row">

    <div class="col-md-10 col-md-offset-1">
        <?= $this->draw('admin/menu') ?>
        <h1>Fitness Settings</h1>
       
        <div class="explanation">
            <p>
                These settings will be reflected across all fitness activities in the site.  If you have any issues please
                report them on <a href="https://github.com/funwhilelost/KnownFitness/issues">Github</a>.
            </p>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form action="<?= \Idno\Core\Idno::site()->config()->getDisplayURL() ?>admin/fitness" class="form-horizontal" method="post">
        <div class="control-group">
                <div class="content-type">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="name">Metric </label>
                        </div>
                        <div class="config-toggle col-md-4">
                            <input type="checkbox" data-toggle="toggle" data-onstyle="info" data-on="Yes" data-off="No"
                                   name="metric"
                                   value="true" 
                                   <?php if (\Idno\Core\Idno::site()->config()->fitness['metric'] == true) echo 'checked'; ?>
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="content-type">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="name">Base Map</label>
                        </div>

                        <div class="config-toggle col-md-4">
                            <select name="mapdata">
                                <?php
                                foreach ([
                                    'OpenStreetMap' => 'osm',
                                    'Thunderforest Outdoors' => 'thunderforest',
                                    'MapQuest' => 'mapquest'
                                ] as $field => $value) {
                                    ?>
                                    <option
                                        value="<?= $value; ?>" <?php
                                        if ($mapdata === $value) {
                                            echo "selected";
                                        }
                                        ?>><?= $field; ?></option>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="content-type">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="name">Weight</label>
                        </div>
                        <div class="config-toggle col-md-4">
                            <input type="text" id="name" placeholder="98%" class="form-control" name="weight" value="<?= $weight ?>" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="content-type">
                    <div class="row">
                        <div class="col-md-2">

                            <label class="control-label" for="name">Height</label>
                        </div>
                        <div class="config-toggle col-md-4">
                            <input type="text" id="name" placeholder="300px" class="form-control" name="height" value="<?= $height ?>" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls-save">
                    <button type="submit" class="btn btn-primary">Save settings</button>
                </div>
            </div>

            <?= \Idno\Core\Idno::site()->actions()->signForm('/admin/fitness') ?>
        </form>
    </div>

</div>