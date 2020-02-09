<?php

namespace Shared\Domain;

use ArrayAccess;
use Countable;
use Iterator;

abstract class Collection implements Iterator, ArrayAccess, Countable
{
    /**
     * @var int
     */
    private $position;

    /**
     * @var array
     */
    private $items;

    public function __construct(array $items = [])
    {
        $this->position = 0;
        $this->items    = $items;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function next() : void
    {
        ++$this->position;
    }

    /**
     * @return int
     */
    public function key() : int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return isset($this->items[$this->position]);
    }

    public function rewind() : void
    {
        $this->position = 0;
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    public function offsetSet($offset, $value) : void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset) : void
    {
        unset($this->items[$offset]);
    }

    public function count()
    {
        return count($this->items);
    }

    public function add($item)
    {
        array_push($this->items, $item);
    }
}