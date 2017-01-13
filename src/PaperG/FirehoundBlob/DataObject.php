<?php

namespace PaperG\FirehoundBlob;

/**
 * Class DataObject
 *
 * This abstract class helps establish a base for other objects to work with.  The main complication
 * is that a DataObject which contains other DataObjects needs those objects registered within $objectKeys
 * An example would be:
 * class A extends `DataObject` contains a field `foo`, and an object `bar`.  $objectKeys should contain [`bar` => FullyQualifiedClassName]
 * so that when creating a `new A` we know what `bar` is.  Additionally, `bar` will be stored within `$objects`
 * instead of $data.  $data is meant for simple values only.
 *
 * @package PaperG\FirehoundBlob
 */
abstract class DataObject implements BlobInterface
{
    use Utility;

    /**
     * @var []
     */
    protected $data;

    /**
     * @var BlobInterface[]
     */
    protected $objects;

    /**
     * @var [] contains key to object class names for use with `new`
     */
    protected $objectKeys;

    public function __construct($array = [])
    {
        $this->objects = [];
        $this->objectKeys = [];
        $this->fromArray($array);
    }

    public function toArray()
    {
        $data = $this->data;
        // Takes the object's subobjects and converts them to arrays
        if (!empty($this->objects)) {
            foreach($this->objects as $key => $object) {
                if (is_array($object)) {
                    $data[$key] = [];
                    /**
                     * @var $object BlobInterface[]
                     */
                    foreach($object as $actualObject) {
                        $data[$key][] = $actualObject->toArray();
                    }
                } elseif (!is_array($object)) {
                    $data[$key] = $object->toArray();
                }
            }
        }

        return $data;
    }

    public function fromArray($array)
    {
        $this->data = $array;
        // This converts associative arrays into their object representations, stores them in `$objects`
        if (!empty($this->objectKeys)) {
            foreach($this->objectKeys as $key => $objectName) {
                if (is_array($objectName)) {
                    $objectName = $objectName[0];
                    $this->objects[$key] = [];
                    if (isset($array[$key]) && is_array($array[$key])) {
                        foreach($array[$key] as $arrayObject) {
                            $this->objects[$key][] = new $objectName($arrayObject);
                        }
                        unset($this->data[$key]);
                    }
                } elseif (isset($array[$key])) {
                    $this->objects[$key] = new $objectName($array[$key]);
                    unset($this->data[$key]);
                }
            }
        }
    }

} 
